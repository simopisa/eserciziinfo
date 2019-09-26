package app;

/**
 * Consumatore
 */
public class Consumatore implements Runnable{
    private String nome;
    private int volte;
    public Consumatore(String nome, int volte){
        this.nome=nome;
        this.volte=volte;
    }
    @Override
    public void run(){
        for (int i = 0; i < volte; i++) {
            App.pieno.P();
            
            try {
                Thread.sleep(1000);
            } catch (Exception e) {
            }
            System.out.println("Sono "+ nome +" e ho consumato: "+App.risorsa );
            


            
            App.vuoto.V();
        }
    }
}