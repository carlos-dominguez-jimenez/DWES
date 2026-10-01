class InstrumentoMusical():

    def tocar(self):
        print("---Sonido del instrumento---")

class Piano(InstrumentoMusical):
    def tocar(self):
        print("¡PLIN!")

class Guitarra(InstrumentoMusical):
    def tocar(self):
        print("¡TRRRRIN!")

instrumento = InstrumentoMusical()
piano = Piano()
guitarra = Guitarra()

instrumento.tocar()
piano.tocar()
guitarra.tocar()