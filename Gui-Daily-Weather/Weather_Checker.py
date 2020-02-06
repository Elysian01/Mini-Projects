#!/usr/bin/env python3



import tkinter as tk
from tkinter import font
import requests

HEIGHT = 600
WIDTH = 800

# API_Key = f95075abc27c22c2f6437a3351337975
#Api_call / url = api.openweathermap.org/data/2.5/weather?q={city name},{country code}


def format_string(weather):
	try:
		name = weather['name']
		description = weather['weather'][0]['description']
		temp = int(weather['main']['temp'] - 273.00 )
		final_string = 'City : %s \nConditions: %s \nTemprature (°C): %s'%(name,description,temp)

	except:
		final_string = 'There was a error retrieving information'
	return final_string



def get_weather(city):
	Weather_key = 'f95075abc27c22c2f6437a3351337975'
	URL = 'https://api.openweathermap.org/data/2.5/weather'
	params = {'APPID' : Weather_key ,'q':city ,'units': 'celsius'}
	response = requests.get(URL,params = params)
	weather = response.json()
	label['text'] = format_string(weather)

def Gui_Construct():
	root =tk.Tk()

	canvas = tk.Canvas(root,height=HEIGHT,width = WIDTH)
	canvas.pack()
	root.title("Daily Weathers")

	background_Image =tk.PhotoImage(file = "landscape.png")
	Image = tk.Label(root,image = background_Image)
	Image.place(relwidth = 1 , relheight =1)

	upper_frame = tk.Frame(root,bd=5, bg ='#80c1ff')
	upper_frame.place(relx =0.07 ,rely =0.125 , relheight =0.10 ,relwidth = 0.86)

	entry = tk.Entry(upper_frame)
	entry.place(relheight = 1 , relwidth = 0.65)

	button = tk.Button(upper_frame , text ='Get Weather',font =("Ubuntu Mono",18 ),command =lambda: get_weather(entry.get()) )
	button.place(relx= 0.68 ,relheight = 1 ,relwidth =0.3 )

	lower_frame = tk.Frame(root,bd = 5, bg ='#80c1ff')
	lower_frame.place(relx =0.07,rely =0.325 , relheight =0.6 ,relwidth = 0.86)

	global label
	label = tk.Label(lower_frame , font= ("Ubuntu Mono",20) ,justify = 'left' ,anchor ='nw')
	label.place(relwidth =1 ,relheight =1)



	root.mainloop()


Gui_Construct()