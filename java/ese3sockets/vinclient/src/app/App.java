package app;

public class App {
    public static void main(String[] args) throws Exception {
        ClientV client=new ClientV("127.0.0.1",6789);
        client.connetti();
        client.comunica();
    }
}