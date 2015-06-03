package org.anas.webservice;

import java.util.List;

import javax.jws.WebService;

@WebService(endpointInterface="org.anas.webservice.OnlineChattingInterface" ,
portName="OnlineChattingPort" , 
serviceName = "OnlineChattingService")
public class OnlineChatting implements OnlineChattingInterface {

	
	@Override
	public boolean CheckLogin(String username , String password){
		return new OnlineChattingImpl().CheckLogin(username, password);
	}
	@Override
	public boolean Register(String username , String password , String name , String email , int age , String sex , String phone){
		return new OnlineChattingImpl().Register(username, password, name, email, age, sex, phone);
	}
	@Override
	public List<Message> getMessage(String tablename){
		return new OnlineChattingImpl().getMessage(tablename);
	}
	@Override
	public boolean sendMessage(String sender , String reciever , String message){
		return new OnlineChattingImpl().sendMessage(sender, reciever, message);
	}
	@Override
	public UserDetails getUserDetails(String username){
		return new OnlineChattingImpl().getUserDetails(username);
	}
	@Override
	public List<Users> getUsers(){
		return new OnlineChattingImpl().getUsers();
	}
	
}
