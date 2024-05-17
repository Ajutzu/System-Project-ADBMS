import tkinter as tk
from tkinter import messagebox
import psycopg2
import loadingScreen

root = tk.Tk()
root.title("ABUS")

icon = tk.PhotoImage(file="Images\\logo.png")  
root.iconphoto(False, icon)

def login():
    username = entry_username.get()
    password = entry_password.get()
    
    if not username or not password:
        messagebox.showerror("Login Failed", "Username and password are required.")
        return
    
    try:
        connection = psycopg2.connect(
                dbname="ABUS",
                user="postgres",
                password="postgres",
                host="localhost",
                port="5432"
        )
        cursor = connection.cursor()

        cursor.execute("SELECT * FROM admin_account WHERE username = %s AND password = %s", (username, password))
        user = cursor.fetchone()

        if user:
            root.destroy()
            loadingScreen.main()
        else:
            messagebox.showerror("Login Failed", "Invalid username or password")

    except (Exception, psycopg2.Error) as error:
        messagebox.showerror("Database Error", str(error))

    finally:
        if connection:
            cursor.close()
            connection.close()

screen_width = root.winfo_screenwidth()
screen_height = root.winfo_screenheight()
window_width = 1280
window_height = 720
x = (screen_width - window_width) // 2
y = (screen_height - window_height) // 2
root.geometry(f"{window_width}x{window_height}+{x}+{y}")
root.resizable(False, False)
root.config(bg='#FFF')

login_image = tk.PhotoImage(file="Images\\login.png") 
bg_label = tk.Label(root, image=login_image)
bg_label.place(y=0)

entry_username = tk.Entry(root, width=48, borderwidth=0, highlightthickness=0, font=("Century Gothic", 12))
entry_username.place(relx=0.58, rely=0.379)

entry_password = tk.Entry(root, show="*", width=48, borderwidth=0, highlightthickness=0, font=("Century Gothic", 12))
entry_password.place(relx=0.58, rely=0.508)

login_button = tk.Button(root, command=login, text="L O G I N", width=20, height=2, borderwidth=0, highlightthickness=0, background="#E2E182", activebackground="#E2E182", cursor="hand2", font=("Century Gothic", 10, "bold"))                      
login_button.place(relx=0.682, rely=0.615)

root.mainloop()
