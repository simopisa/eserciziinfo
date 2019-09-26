package app;

public class App {
    public static void main(String[] args) throws Exception {
        Semaforo sem1= new Semaforo(1);
        Semaforo sem2= new Semaforo(0);
        Semaforo sem3= new Semaforo(0);
        
        Thread din=new Thread(new Campana("din",sem1,sem2));
        Thread don=new Thread(new Campana("don",sem2,sem3));
        Thread dan=new Thread(new Campana("dan",sem3,sem1));
        din.start();
        don.start();
        dan.start();

    }
}