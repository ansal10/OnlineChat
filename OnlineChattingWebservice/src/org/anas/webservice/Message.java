package org.anas.webservice;

public class Message
{
	public String name;
	public String message;
	public String time;
	public Message (String n , String m , String t) {
		this.name=n;
		this.message=m;
		this.time=t;
	}
	public String getName()
	{
		return this.name;
	}
	public String getMessage()
	{
		return this.message;
	}
	public String getTime()
	{
		return this.time;
	}
}

