package app;

public class App {
    public static void main(String[] args) throws Exception {
        UDPServer ser=new UDPServer(6789);
        ser.attendi();
        ser.Comunica();
    }
}