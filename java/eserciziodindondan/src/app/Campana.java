package app;

/**
 * Campana
 */
public class Campana implements Runnable {
    private String nome;
    private Semaforo sem1;
    private Semaforo sem2;
    

    public Campana(String nome, Semaforo sem1, Semaforo sem2){
        this.nome=nome;
        this.sem1=sem1;
        this.sem2=sem2;
        

        
    }
    @Override
    public void run(){
        for (int i = 1; i >0; i++) {
           sem1.P();
           try {
               Thread.sleep(1000);
           } catch (Exception e) {
               
           }
            System.out.println(nome);
           sem2.V();
        
        }
    }
    
}