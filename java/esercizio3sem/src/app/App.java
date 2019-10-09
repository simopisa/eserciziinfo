package app;

import java.util.Scanner;

public class App {
    protected static int distributore;
    public static void main(String[] args) throws Exception {
        Scanner input=new Scanner(System.in);
        
        try {
            System.out.println("iserire la capacità della botte: ");
            distributore=input.nextInt();

            if (distributore<0) {
                System.out.println("inserire un valore maggiore di 0");
            }
            
        } catch (Exception e) {
            //TODO: handle exception
        }
      
        
  


        Semaforo sem1= new Semaforo(1);
        Thread macchina1=new Thread(new Distributore("macchina1", sem1));
        Thread macchina2=new Thread(new Distributore("macchina2", sem1));
        Thread rifornitore=new Thread(new Fornitore(sem1));
        macchina1.start();
        macchina2.start();
        rifornitore.start();

    }
}