package org.anas.webservice;

import java.util.List;



public class Main {

	public static void main(String[] args) {
		List<Message> list = new OnlineChatting().getMessage("juggu");
		for(int i = 0 ; i < list.size() ; i++)
		{
			System.out.println(list.get(i).name+"    "+list.get(i).message+"      "+list.get(i).time +"\n\n");
		}
	}

}
