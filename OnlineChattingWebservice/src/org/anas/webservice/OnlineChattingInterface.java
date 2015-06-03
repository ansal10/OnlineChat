package org.anas.webservice;

import java.util.List;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService(
		name="OnlineChatting" ,
		targetNamespace = "http://www.OnlineChatting.com/")
public interface OnlineChattingInterface {
	
	@WebMethod
	public abstract boolean CheckLogin(String username , String password);
	
	@WebMethod
	public boolean Register(String username , String password , String name , String email , int age , String sex , String phone);
	
	@WebMethod
	public List<Message> getMessage(String tablename);
	
	@WebMethod
	public boolean sendMessage(String sender , String reciever , String message);
	
	@WebMethod
	public UserDetails getUserDetails(String username);
	
	@WebMethod
	public List<Users> getUsers();

}