package org.anas.webservice;

public class UserDetails {
	public String username;
	public String name;
	public String email;
	public String age;
	public String sex;
	public String phone;
	public UserDetails(String username, String name, String email ,String age, String sex ,String phone)
	{
		this.age=age;
		this.email=email;
		this.name=name;
		this.phone=phone;
		this.sex=sex;
		this.username=username;
	}

}
