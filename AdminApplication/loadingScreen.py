import tkinter as tk
from tkinter import ttk
from tkinter.ttk import Progressbar

def main():
    root = tk.Tk()
    root.title("ABUS")
    icon = tk.PhotoImage(file="Images\\loading.png")  
    icon1 = tk.PhotoImage(file="Images\\logo.png") 
    root.iconphoto(False, icon1)

    screen_width = root.winfo_screenwidth()
    screen_height = root.winfo_screenheight()
    
    window_width = 1280
    window_height = 720 
    x = (screen_width - window_width) // 2
    y = (screen_height - window_height) // 2
    root.geometry(f"{window_width}x{window_height}+{x}+{y}")
    root.resizable(False, False)
    root.config(bg='#FFF')

    bg_label = tk.Label(root, image=icon)
    bg_label.place(x=0, y=0)

    progress_label = tk.Label(root, text="Loading...", font=("Century Gothic", 12), fg="#FFF", bg="#FFF")

    progress = ttk.Style()
    progress.theme_use('default')
    progress.configure("red.Horizontal.TProgressbar", background="#814B27", troughcolor="White", bordercolor="black")

    progress = Progressbar(root, orient='horizontal', length=610, mode='determinate', style="red.Horizontal.TProgressbar")
    progress.place(x=330, y=390)
    
    def top():
        root.destroy()

    i = 0

    def load():
        nonlocal i
        if i <= 10:
            txt = 'Loading. . . ' + (str(10*i)+'%')
            progress_label.config(text=txt)
            progress_label.after(200, load)
            progress['value'] = 10*i
            i += 1
        else:
            top()
            start_abus_system()

    def start_abus_system():
        import abusSystem as abus

    load()
    root.mainloop()

if __name__ == "__main__":
    main()
