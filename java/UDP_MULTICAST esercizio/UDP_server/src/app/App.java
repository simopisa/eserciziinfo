package app;


public class App {
    public static void main(String[] args) throws Exception {
        MulticastServer server=new MulticastServer(5329, "225.4.5.6");
        server.comunica();


        
    }
} 