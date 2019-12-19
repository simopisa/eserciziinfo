package app;

public class App {
    public static void main(String[] args) throws Exception {
       UDPClient cli=new UDPClient("localhost",6789);
       cli.connetti();
       cli.comunica();
        
    }
}
