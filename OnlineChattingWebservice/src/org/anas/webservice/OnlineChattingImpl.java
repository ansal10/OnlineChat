package org.anas.webservice;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class OnlineChattingImpl {
	
	public boolean CheckLogin(String username , String password)
	{
		try{
		Sql sql = new Sql();
		ResultSet rs = sql.SelectStatement("select * from password_details");
		while(rs.next())
		{
			String user = rs.getString(2);
			String pass = rs.getString(3);
			
			if(user.equals(username)&&pass.equals(password))
				return true;
		}
		return false;
		}catch(SQLException e){return false;}
	}

	public boolean Register(String username , String password , String name , String email , int age , String sex , String phone)

	{
	try{
		// checks wheter username exist in DataBase or not
		ResultSet rs = new Sql().SelectStatement("select * from user_details where (username = '"+username+"')");
		// if row exist with username Exist return false
		if(rs.next())
		return false;
		else {// enter new details in database
			
			String q1 = "insert into user_details values ('"+username+"','"+name+"','"+email+"' ,"+age+",'"+sex+"' , '"+phone+"')";
			String q2="insert into password_details values ('"+name+"' , '"+username+"' , '"+password+"')";
			if(new Sql().UpdateStatement(q1) && new Sql().UpdateStatement(q2) && CreateUserTable(username))
			return true;
			else return false;
		}
	 }	catch(SQLException e){
		
		return false;
		}
	}
	
	public boolean CreateUserTable(String tablename)
	{
		return new Sql().UpdateStatement("create table "+tablename+" (recieved_from varchar(50) , message text , time DATETIME DEFAULT CURRENT_TIMESTAMP )");
	}
	/*
	 * CREATE TABLE taps(
recieved_from VARCHAR( 50 ) ,
message TEXT,
TIME DATETIME DEFAULT CURRENT_TIMESTAMP
)
	 * */
	public List<Message> getMessage(String tablename)
	{
		
		List<Message> list = new ArrayList<>();
		ResultSet rs = new Sql().SelectStatement("select * from "+tablename);
		
		try{
		while(rs.next())
		{
			Message tmp = new Message(rs.getString(1),rs.getString(2),rs.getString(3));
			list.add(tmp);
		}
		new Sql().UpdateStatement("delete from "+tablename);
		return list;
		}catch(SQLException e){
			return list;
		}
	}

	public boolean sendMessage(String sender , String reciever , String message)
	{
		try{
		ResultSet rs = new Sql().SelectStatement("select * from password_details where user_name = '"+sender+"'");
		rs.next();
		String name = rs.getString("name");
		name = name+" ( "+sender+" )";
		return new Sql().UpdateStatement("insert into "+reciever+"(recieved_from , message) values('"+name+"' , '"+message+"')");
		
		}catch(SQLException e){return false;}
		
	}
	
	public UserDetails getUserDetails(String username)
	{
		ResultSet rs = new Sql().SelectStatement("select * from user_details where username = '"+username+"'");
		try{rs.next();
		UserDetails userdetails = new UserDetails(rs.getString(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5), rs.getString(6));
		return userdetails;
		}catch(SQLException e){return new UserDetails(null, null, null, null, null, null);}
	}
	
	public List<Users> getUsers()
	{
		List<Users> list = new ArrayList<>();
		ResultSet rs = new Sql().SelectStatement("select username , name from user_details");
		try{
			while(rs.next())
			{
				Users tmp = new Users(rs.getString(1), rs.getString(2));
				list.add(tmp);
			}
			return list;
		}catch(SQLException e)
		{
			return list;
		}
	}
}
