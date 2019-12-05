package app;

public class App {
    public static void main(String[] args) throws Exception {
        ServerV server=new ServerV(6789);
        server.attendi();
    }
}