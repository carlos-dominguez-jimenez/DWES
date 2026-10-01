class Vehiculo():
    def __init__(self, marca, modelo):
        self.marca = marca
        self.modelo = modelo

    def Informacion(self):
        print("---INFORMACIÓN---")
        print("Marca: ", self.marca)
        print("Modelo: ", self.modelo)

class Coche(Vehiculo):
    def __init__(self, marca, modelo, puertas):
        super().__init__(marca, modelo)
        self.puertas = puertas

    def Informacion(self):
        super().Informacion()
        print("Este coche tiene: ", self.puertas, " puertas")

class Bicicleta(Vehiculo):
    def __init__(self, marca, modelo, ruedas):
        super().__init__(marca, modelo)
        self.ruedas = ruedas

    def Informacion(self):
        super().Informacion()
        print("La bici tiene: ", self.ruedas, " ruedas")

vehiculo = Vehiculo("Audi", "Q3")
coche = Coche("Mercedes", "GLC", 3)
bicicleta = Bicicleta("BT", "2034", 2)

vehiculo.Informacion()
bicicleta.Informacion()
coche.Informacion()