package app;


public class App {
    public static void main(String[] args) throws Exception {
        MulticastServer server=new MulticastServer(6782, "225.4.5.6");
        server.comunica();


    }
} 