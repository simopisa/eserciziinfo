package app;

public class App {
    protected static int dispenser=200;
    public static void main(String[] args) throws Exception {
        Semaforo sem1= new Semaforo(1);
        Semaforo sem2= new Semaforo(0);
        Semaforo sem3= new Semaforo(0);
        
        Thread carlo=new Thread(new Dispense("Carlo",sem1,sem2));
        Thread matilde=new Thread(new Dispense("Matilde",sem2,sem3));
        Thread francesco=new Thread(new Dispense("Francesco",sem3,sem1));
        carlo.start();
        matilde.start();
        francesco.start();
    }
}