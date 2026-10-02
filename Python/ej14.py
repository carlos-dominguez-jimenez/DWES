class CuentaBancaria():
    
    def __init__(self, titular, saldo):
        self.titular=titular
        self.saldo=saldo
        
    def depositar(self, cantidad):
        if cantidad<=0:
            print("ERROR. La cantidad debe ser positiva")
        
        self.saldo += cantidad
        print("Depósito de ", cantidad, " euros realizado.")
        
    def retirar(self, retirada):
        if retirada <=0:
            print("ERROR. Debes retirar una cantidad positiva.")
        elif retirada > self.saldo:
            print("Saldo insuficiente.")
        else :
            self.saldo -=  retirada
            print("Retirada de ", retirada, " euros realizada.")
            
    def informacion(self):
        print("Su saldo es: ", self.saldo)
        
cuenta = CuentaBancaria("Carlos", 200)
cuenta.depositar(0)
cuenta.depositar(50)
cuenta.retirar(300)
cuenta.retirar(200)
cuenta.informacion()
    