package app;

public class App {
    public static void main(String[] args) throws Exception {

        MulticastClient client=new MulticastClient(6782,"225.4.5.6");
        client.comunica();
       
    }
}