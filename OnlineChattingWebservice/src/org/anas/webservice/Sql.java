package org.anas.webservice;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Sql {
	
	//JDBC driver name and DATABASE url
    private String JDBC_DRIVER;
    private String DB_URL;
    
    //Username And Password
    private String USER;
    private String PASS;
    
    //Sql Variable
    private Connection conn ;
    private Statement stmt;
    public void setJDBC(String driver , String url)
    {
    	this.JDBC_DRIVER=driver;
    	this.DB_URL=url;
    }
    public void setUSER(String user , String pass)
    {
    	this.USER=user;
    	this.PASS=pass;
    }
    public Sql()
    {
    	setJDBC("com.mysql.jdbc.Driver", "jdbc:mysql://localhost/online_chat");
    	setUSER("root" , "ansal10");
    }
    public ResultSet SelectStatement(String query) 
    {
    	try{
    		
    	Class.forName(JDBC_DRIVER);
    	conn = DriverManager.getConnection(DB_URL, USER, PASS);
    	stmt = conn.createStatement();
    	ResultSet rs = stmt.executeQuery(query);
    	
    	return rs;
    	}catch(SQLException e)
    	{
    		e.printStackTrace();
    		ResultSet rs = null;
    		return rs;
       	}catch (ClassNotFoundException e) {
       		
			ResultSet rs = null;
			return rs;
		}
    }
    public boolean UpdateStatement(String query)
    {
    	try{
    	Class.forName(JDBC_DRIVER);
    	conn = DriverManager.getConnection(DB_URL, USER, PASS);
    	stmt = conn.createStatement();
    	stmt.executeUpdate(query);
    	return true;
    	}catch(SQLException e)
    	{
    		return false;
    	}catch(ClassNotFoundException e)
    	{
    		return false;
    	}
    }
   
}