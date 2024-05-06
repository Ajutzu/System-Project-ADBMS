import tkinter as tk
from tkinter import ttk, Scrollbar, messagebox
import psycopg2
import datetime
from tkcalendar import DateEntry 

root = tk.Tk()
root.title("ABUS")  
icon = tk.PhotoImage(file="Images\\logo.png")  
title = tk.PhotoImage(file="Images\\title.png")
dashboard = tk.PhotoImage(file="Images\\dashboard.png")
updates = tk.PhotoImage(file="Images\\update.png")
root.iconphoto(False, icon)

try:
    connection = psycopg2.connect(
                dbname="ABU'S",
                user="postgres",
                password="postgres",
                host="localhost",
                port="5432"
        )
    print("Connection established successfully!")
except psycopg2.Error as e:
    print("Error: Unable to connect to the database:", e)

cursor = connection.cursor()

def delete_all_messages(cursor, tree):
    
    try:
    # Display a confirmation dialog
        if messagebox.askokcancel("Warning", "Are you sure you want to delete all messages?"):
        # Delete all messages from the database
            cursor.execute("""
            BEGIN TRANSACTION;
            DELETE FROM messages;
            COMMIT;
        """)
        
            cursor.connection.commit()

            print("All messages deleted successfully")

        # Clear the treeview
            tree.delete(*tree.get_children())
        else:
            print("Deletion canceled by user")
    
    except Exception as ex:
        print("Error occurred:", ex)
        cursor.connection.rollback()

def on_double_click(event, tree):
    # Get the item that was clicked
    item = tree.selection()[0]  
    
    # Retrieve the ID from the first column of the selected row
    pkey = tree.item(item, "values")[0]
    
    print("pkey:", pkey)  # Print the value of pkey
    
    # Create a popup window
    popup = tk.Toplevel()
    popup.title("Update Row")
    screen_width = popup.winfo_screenwidth()
    screen_height = popup.winfo_screenheight()
    window_width = 223
    window_height = 153
    x = (screen_width - window_width) // 2
    y = (screen_height - window_height) // 2
    popup.geometry(f"{window_width}x{window_height}+{x}+{y}")
    popup.resizable(False, False)
    popup.iconphoto(False, icon)
    
    updates1 = tk.Label(popup, image=updates)
    updates1.pack()
    updates1.lower()
    # Create and place the label for the dropdown menu
    update_label = tk.Label(popup, text="Column you want to update:", font=("Century Gothic", 9), bg='#3586ff', fg="#FFF")
    x_coordinate = (popup.winfo_width() - update_label.winfo_reqwidth()) / 2
    update_label.place(x=x_coordinate, y=5)

    
    # Define the options for the dropdown menu
    options = ['name', 'contact_no', 'date', 'purpose', 'time_in', 'time_out']
    
    # Variable to store the selected option
    selected_option = tk.StringVar(popup)
    selected_option.set(options[0])  # Set the default option
    
    # Create the dropdown menu
    update_dropdown = tk.OptionMenu(popup, selected_option, *options)
    update_dropdown.config(fg='#3586ff', bd=0, width=15 , bg="#FFF")
    update_dropdown.config(activeforeground='#3586ff', activebackground="#FFF")  # For active state
    x_coordinate = (popup.winfo_width() - update_dropdown.winfo_reqwidth()) / 2
    update_dropdown.place(x=x_coordinate, y=32)

    # Function to handle the update button click
    def update_record():
        # Get the selected attribute from the dropdown menu
        attribute = selected_option.get()
        value = value_entry.get()

        try:
            if not value:
                raise ValueError("Value is empty")

            # Retrieve the visit_id from the selected row
            visit_id = pkey

            customer_id_query = "SELECT customer_id FROM VisitInfo WHERE visit_id = %s"
            cursor.execute(customer_id_query, (visit_id,))
            result = cursor.fetchone()
            if not result:
                raise ValueError("Visit ID does not exist")

            customer_id = result[0]
    
            print("Attribute:", attribute)
            if attribute in ['name', 'contact_no']:  
                print("Updating CustomerInfo...")
                update_query = f"UPDATE CustomerInfo SET {attribute} = %s WHERE customer_id = %s"
                cursor.execute(update_query, (value, customer_id))
            
            elif attribute in ['date', 'reason_of_visit', 'purpose', 'time_in', 'time_out', 'signature', 'package', 'head', 'total_price']:  
                print("Updating VisitInfo...")
                update_query = f"UPDATE VisitInfo SET {attribute} = %s WHERE visit_id = %s"
                cursor.execute(update_query, (value, visit_id))
            else:
                raise ValueError("Invalid attribute")

            cursor.connection.commit()
            print("Update successful")

            refresh_table(cursor, tree)

        except psycopg2.Error as e:
            print("Error:", e)
            cursor.connection.rollback()

            popup.destroy()  # Close the popup window after successful update

        except ValueError as e:
            messagebox.showerror("Error", str(e))

    # Create and place the label and entry for the value to update
    value_label = tk.Label(popup, text="New value:", font=("Century Gothic", 9), bg='#3586ff', fg="#FFF")
    x_coordinate = (popup.winfo_width() - value_label.winfo_reqwidth()) / 2
    value_label.place(x=x_coordinate, y=65)

    value_entry = tk.Entry(popup, width=25, font=("Century Gothic", 9))
    x_coordinate = (popup.winfo_width() - value_entry.winfo_reqwidth()) / 2
    value_entry.place(x=x_coordinate, y=90)

    # Create and place the update button
    update_button = tk.Button(popup, text="Update", command=update_record, cursor="hand2", font=("Century Gothic", 7), fg='#3586ff', bd=0, width=15 , bg="#FFF")
    x_coordinate = (popup.winfo_width() - update_button.winfo_reqwidth()) / 2
    update_button.place(x=x_coordinate, y=119)
    
def delete_message(cursor, tree):
    try:
        # Get the selected item in the treeview
        selected_item = tree.selection()
        
        if not selected_item:
            raise ValueError("Please select a message to delete")

        for item in selected_item:
            # Extract the fullname from the selected item
            fullname = tree.item(item, "values")[0]
            
            # Delete the message with the extracted fullname
            cursor.execute("""
                BEGIN TRANSACTION;
                DELETE FROM messages 
                WHERE fullname = %s;
                COMMIT;
            """, (fullname,))
        
        cursor.connection.commit()

        print("Deletion successful")

        refresh_table2(cursor, tree)
    
    except ValueError as e:
        print("Error:", e)
        cursor.connection.rollback() 
    except Exception as ex:
        print("Error occurred:", ex)
        cursor.connection.rollback()

def refresh_table2(cursor, tree):
    tree.delete(*tree.get_children())

    cursor.execute("""
        BEGIN TRANSACTION;
        Select fullname, province, subject from messages
        LIMIT 50;
        """)
    rows = cursor.fetchall()

    for row in rows:
        tree.insert(parent='', index='end', text='', values=row)

def refresh_table(cursor, tree):
    # Clear existing data
    tree.delete(*tree.get_children())

    cursor.execute("""
    SELECT 
        V.visit_id,
        C.name,
        V.date,
        V.time_in,
        V.time_out,
        C.contact_no,
        V.head,
        V.total_price,
        COALESCE(AC.add_ons_concat, '') AS add_ons_concat,
        COALESCE(FC.facilities_concat, '') AS facilities_concat
    FROM 
        VisitInfo V
    LEFT JOIN 
        CustomerInfo C ON V.customer_id = C.customer_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(add_on, ', ') AS add_ons_concat
        FROM 
            AddOns
        GROUP BY 
            visit_id
    ) AS AC ON V.visit_id = AC.visit_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(facility, ', ') AS facilities_concat
        FROM 
            Facilities
        GROUP BY 
            visit_id
    ) AS FC ON V.visit_id = FC.visit_id
    order by visit_id desc
    LIMIT 50;
        """)
    rows = cursor.fetchall()

    for row in rows:
        tree.insert(parent='', index='end', text='', values=row)

def delete_selected_row(cursor, tree):
    selected_item = tree.selection()
    if selected_item:
        visit_id = tree.item(selected_item, "values")[0]  

        try:
            if not visit_id.isdigit():
                raise ValueError("Visit ID must be numeric")

            visit_id = int(visit_id)

            cursor.execute("SELECT COUNT(*) FROM visitinfo WHERE visit_id = %s", (visit_id,))
            count = cursor.fetchone()[0]

            if count == 0:
                raise ValueError("visit_id does not exist in the database")

            cursor.execute("""
                DELETE FROM facilities 
                WHERE visit_id = %s
            """, (visit_id,))

            cursor.execute("DELETE FROM addons WHERE visit_id = %s", (visit_id,))

            cursor.execute("DELETE FROM visitinfo WHERE visit_id = %s", (visit_id,))

            if count == 1:
                cursor.execute("SELECT visitinfo.customer_id FROM visitinfo WHERE visit_id = %s", (visit_id,))
                result = cursor.fetchone()
                if result:
                    check = result[0]
                    cursor.execute("DELETE FROM customerinfo WHERE customer_id = %s", (check,))
                else:
                    print("No matching visit_id found in the visitinfo table.")

            cursor.connection.commit()

            refresh_table(cursor, tree)

            print("Deletion successful")

            refresh_table(cursor, tree)

        except ValueError as e:
            print("Error:", e)
            cursor.connection.rollback()

def filter_data(date_entry, cursor, tree):
    selected_date = date_entry.get()
    # Fetch data from the database based on the selected date

    try:
        parsed_date = datetime.datetime.strptime(selected_date, "%Y-%m-%d")
    except ValueError:
        print('Error')
        return

    cursor.execute("""
    SELECT 
        V.visit_id,
        C.name,
        V.date,
        V.time_in,
        V.time_out,
        C.contact_no,
        V.head,
        V.total_price,
        COALESCE(AC.add_ons_concat, '') AS add_ons_concat,
        COALESCE(FC.facilities_concat, '') AS facilities_concat
    FROM 
        VisitInfo V
    LEFT JOIN 
        CustomerInfo C ON V.customer_id = C.customer_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(add_on, ', ') AS add_ons_concat
        FROM 
            AddOns
        GROUP BY 
            visit_id
    ) AS AC ON V.visit_id = AC.visit_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(facility, ', ') AS facilities_concat
        FROM 
            Facilities
        GROUP BY 
            visit_id
    ) AS FC ON V.visit_id = FC.visit_id
    where v.date = %s;
        """, (selected_date,))
    rows = cursor.fetchall()
    
    # Clear existing data in the table
    for item in tree.get_children():
        tree.delete(item)
    
    # Insert filtered data into the table
    for row in rows:
        tree.insert(parent='', index='end', text='', values=row)

def home_page():
    home_frame= tk.Frame(main_frame)
    lb = tk.Label(home_frame, image=dashboard)
    lb.pack() 
    home_frame.pack()
    
def contact_page(tree1): 
    cursor.execute("""
        BEGIN TRANSACTION;
        SELECT 
            fullname,
            province,
            subject
        FROM 
            messages
        LIMIT 50;
        """)
    rows = cursor.fetchall()

    for row in rows:
        tree1.insert(parent='', index='end', text='', values=row)
        
def contact_page():
    contact_frame= tk.Frame(main_frame, background='#3586ff', highlightbackground='#3586ff', highlightthickness=0.5)

    contact_frame.pack(pady=10)

    # Date Label
    # Date Label
    date_label = tk.Label(contact_frame, text="Select row to delete:  ", font=("Century Gothic", 9), bg="#3586ff", fg='#FFF')
    date_label.grid(row=2, column=1, sticky='e')
        
    # Date Entry with Date Picker
    date_entry = DateEntry(contact_frame, width=12, background='#3586ff', foreground='white', borderwidth=2, font=("Century Gothic", 9), selectbackground='#3586ff', selectforeground='white', date_pattern='yyyy-mm-dd')
    date_entry.grid(row=2, column=0, padx=5, pady=7, sticky='e')

    # Filter Button
    filter_button = tk.Button(contact_frame, text="Filter", cursor="hand2", font=("Century Gothic", 7), command=lambda: filter_data(date_entry, cursor, tree), bg='#FFF', bd=0, width=10, fg="#3586ff" )
    filter_button.grid(row=2, column=1, padx=5, pady=7, sticky='w')

    # Creating a Treeview widget
    tree = ttk.Treeview(contact_frame)
        
    delete_button = tk.Button(contact_frame, text="Delete", cursor="hand2", font=("Century Gothic", 7), command=lambda: delete_selected_row(cursor, tree), bg='#FFF', bd=0, width=10, fg="#3586ff" )
    delete_button.grid(row=2, column=2, sticky='w')

    vsb = Scrollbar(contact_frame, orient="vertical", command=tree.yview)
    tree.configure(yscrollcommand=vsb.set)
    tree.configure(height=32)


    tree.bind("<Double-1>", lambda event: on_double_click(event, tree))
     # Define columns
    tree["columns"] = (
        "Visit_ID",
        "Name",
        "Date",
        "Time_In",
        "Time_Out",
        "Contact",
        "Head",
        "Total_Price",
        "Add_Ons",
        "Facilities"
    )

    # Format columns
    tree.column("#0", width=0, stretch=tk.NO)  # hidden column
    tree.column("Visit_ID", anchor=tk.W, width=50)
    tree.column("Name", anchor=tk.W, width=150)
    tree.column("Date", anchor=tk.W, width=70)
    tree.column("Time_In", anchor=tk.W, width=70)
    tree.column("Time_Out", anchor=tk.W, width=70)
    tree.column("Contact", anchor=tk.W, width=80)
    tree.column("Head", anchor=tk.CENTER, width=50)
    tree.column("Total_Price", anchor=tk.W, width=70)
    tree.column("Add_Ons", anchor=tk.W, width=220)
    tree.column("Facilities", anchor=tk.W, width=230)

    # Create headings
    tree.heading("#0", text="", anchor=tk.CENTER)
    tree.heading("Visit_ID", text="Visit_ID", anchor=tk.CENTER)
    tree.heading("Name", text="Name", anchor=tk.CENTER)
    tree.heading("Date", text="Date", anchor=tk.CENTER)
    tree.heading("Time_In", text="Time_In", anchor=tk.CENTER)
    tree.heading("Time_Out", text="Time_Out", anchor=tk.CENTER)
    tree.heading("Contact", text="Contact", anchor=tk.CENTER)
    tree.heading("Head", text="Head", anchor=tk.CENTER)
    tree.heading("Total_Price", text="Total_Price", anchor=tk.CENTER)
    tree.heading("Add_Ons", text="Add_Ons", anchor=tk.CENTER)
    tree.heading("Facilities", text="Facilities", anchor=tk.CENTER)


# Fetch data from the database and insert into the table
    cursor.execute("""
    SELECT 
        V.visit_id,
        C.name,
        V.date,
        V.time_in,
        V.time_out,
        C.contact_no,
        V.head,
        V.total_price,
        COALESCE(AC.add_ons_concat, '') AS add_ons_concat,
        COALESCE(FC.facilities_concat, '') AS facilities_concat
    FROM 
        VisitInfo V
    LEFT JOIN 
        CustomerInfo C ON V.customer_id = C.customer_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(add_on, ', ') AS add_ons_concat
        FROM 
            AddOns
        GROUP BY 
            visit_id
    ) AS AC ON V.visit_id = AC.visit_id
    LEFT JOIN (
        SELECT 
            visit_id,
            STRING_AGG(facility, ', ') AS facilities_concat
        FROM 
            Facilities
        GROUP BY 
            visit_id
    ) AS FC ON V.visit_id = FC.visit_id
    order by visit_id desc
    LIMIT 50;
    """)

    rows = cursor.fetchall()

    for row in rows:
        tree.insert(parent='', index='end', text='', values=row)

    # Add padding to cells
    style = ttk.Style()
    style.configure("Treeview")

    # Add custom style
    style.theme_use('default')  # You can choose other themes like "clam", "alt", etc. 
    style.configure("Treeview.Heading", font=("Century Gothic", 8), background="#3586ff", foreground="White")  # Customizing heading font
    style.configure("Treeview", font=("Century Gothic", 8))  # Customizing cell font
    style.configure("Treeview", background="#E4E9F7")  # Customizing background color
    style.configure("Treeview", foreground="black")  # Customizing text color
    style.configure("Treeview", fieldbackground="#FFF")  # Customizing field background color
    style.configure("Treeview", borderwidth=0)  # Customizing border width

    
    # Add to contact_frame instead of root
    tree.grid(row=1, column=0, columnspan=3, sticky="nsew")

    rows = cursor.fetchall()

def request_page():
    request_frame= tk.Frame(main_frame, background='#3586ff', highlightbackground='#3586ff', highlightthickness=0.5)

    # Date Label

    date_entry = tk.Entry(request_frame, width=1, bd=0, highlightbackground='#3586ff', bg='#3586ff')
    date_entry.grid(row=2, column=0, padx=5,pady=7, sticky='w')
    
    date_label = tk.Label(request_frame, text="Select row the message you want to delete:  ", font=("Century Gothic", 9), bg="#3586ff", fg='#FFF')
    date_label.grid(row=2, column=0, sticky='e')
        
    # Date Entry
    delete_all_button = tk.Button(request_frame, text="Delete All", cursor="hand2", font=("Century Gothic", 7), command=lambda: delete_all_messages(cursor, tree), bg='#FFF',  bd=0,  width=10, fg="#3586ff")
    delete_all_button.grid(row=2, column=2, sticky='w')

    date_label2 = tk.Label(request_frame, text=" Delete all messages:  ", font=("Century Gothic", 9), bg="#3586ff", fg='#FFF')
    date_label2.grid(row=2, column=1, sticky='e')
        
    # Filter Button 
    filter_button = tk.Button(request_frame, text="Delete", cursor="hand2", font=("Century Gothic", 7), command=lambda: delete_message(cursor, tree), bg='#FFF', bd=0, width=10, fg="#3586ff" )
    filter_button.grid(row=2, column=1, sticky='w')
    # Creating a Treeview widget
    tree = ttk.Treeview(request_frame)

    # Define columns
    tree = ttk.Treeview(request_frame)
    tree.configure(height=32)
    tree["columns"] = ("FullName", "Address", "Subject")

# Format columns
    tree.column("#0", width=0, stretch=tk.NO) 
    tree.column("FullName", anchor=tk.W, width=200)
    tree.column("Address", anchor=tk.W, width=300)
    tree.column("Subject", anchor=tk.W, width=560)  # Adjusted width for Subject column

# Create headings
    tree.heading("#0", text="", anchor=tk.CENTER)
    tree.heading("FullName", text="FullName", anchor=tk.CENTER)
    tree.heading("Address", text="Address", anchor=tk.CENTER)
    tree.heading("Subject", text="Subject", anchor=tk.CENTER)

# Fetch data from the database and insert into the table
    cursor.execute("""
        BEGIN TRANSACTION;
        SELECT 
            fullname,
            province,
            subject
        FROM 
            messages
        LIMIT 50;
        """)
    rows = cursor.fetchall()

    for row in rows:
        tree.insert(parent='', index='end', text='', values=row)

# Add padding to cells
    style = ttk.Style()
    style.configure("Treeview")

# Add custom style
    style.theme_use('default')  # You can choose other themes like "clam", "alt", etc. 
    style.configure("Treeview.Heading", font=("Century Gothic", 8), background="#3586ff", foreground="White")  # Customizing heading font
    style.configure("Treeview", font=("Century Gothic", 8))  # Customizing cell font
    style.configure("Treeview", background="#E4E9F7")  # Customizing background color
    style.configure("Treeview", foreground="black")  # Customizing text color
    style.configure("Treeview", fieldbackground="#FFF")  # Customizing field background color
    style.configure("Treeview", borderwidth=0)  # Customizing border width

# Add to contact_frame instead of root
    tree.grid(row=1, column=0, columnspan=3, sticky="nsew")

    request_frame.pack(pady=10)
    
def hide_indicators():
    home_indicate.config(bg='#FFF')
    contact_indicate.config(bg='#FFF')
    request_indicate.config(bg='#FFF')

def indicate(lb, page):
    hide_indicators()
    lb.config(bg='#3586ff')
    delete_page()
    page()

def delete_page():
    for frame in main_frame.winfo_children():
        frame.destroy()

screen_width = root.winfo_screenwidth()
screen_height = root.winfo_screenheight()
window_width = 1280
window_height = 720
x = (screen_width - window_width) // 2
y = (screen_height - window_height) // 2
root.geometry(f"{window_width}x{window_height}+{x}+{y}")
root.resizable(False, False)

options_frame = tk.Frame(root, bg='#FFF')

resized_image = title.subsample(3, 3)
titles = tk.Label(root, image=resized_image,  borderwidth=0, highlightthickness=0)
titles.place(x=15, y=30)

home_btn = tk.Button(options_frame, text='Dashboard',cursor="hand2", font=("Century Gothic", 12),fg='#707070', bd=0, width=10, bg="#FFF", command=lambda: indicate(home_indicate, home_page))
home_btn.place(x=10, y=100)

home_indicate = tk.Label(options_frame, text='', bg='#FFF')
home_indicate.place(x=10, y=100, width=5, height=35)

contact_btn = tk.Button(options_frame, text='List Bookings',cursor="hand2", font=("Century Gothic", 12),fg='#707070', bd=0, width=11, bg="#FFF",  command=lambda: indicate(contact_indicate, contact_page))
contact_btn.place(x=10, y=150)

contact_indicate = tk.Label(options_frame, text='', bg='#FFF')
contact_indicate.place(x=10, y=150, width=5, height=35)

tm = tk.Label(root, text='DBMS Group Inc.™', bg="#FFF", fg="#707070", font=("Century Gothic", 7))
tm.place(x=47, y=680)

message_btn = tk.Button(options_frame, text='Client Feedback', cursor="hand2", font=("Century Gothic", 12), fg='#707070', bd=0, width=14, bg="#FFF", command=lambda: indicate(request_indicate, request_page))
message_btn.place(x=10, y=200)

request_indicate = tk.Label(options_frame, text='', bg='#FFF')
request_indicate.place(x=10, y=200, width=5, height=35)


options_frame.pack(side=tk.LEFT)
options_frame.pack_propagate(False)
options_frame.configure(width=200, height=720,  borderwidth=0, highlightthickness=0)

main_frame = tk.Frame(root, bg="#FFF" ,highlightbackground='#3586ff', highlightthickness=0.5)
main_frame.pack(side=tk.LEFT)
main_frame.pack_propagate(False)
main_frame.configure(height=720, width=1280)

image_main = tk.PhotoImage(file="Images\\dashboard.png")
label_main = tk.Label(main_frame, image=image_main)
label_main.pack()

root.mainloop()

