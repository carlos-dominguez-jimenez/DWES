class persona():
    
    def __init__(self, nombre, edad):
        self.nombre=nombre
        self.edad=edad
        
    def decirNombre(self):
        return self.nombre

    def decirEdad(self):
        return self.edad
            
per1 = persona("Gabriel", 22)

print(per1.decirNombre())
print(per1.decirEdad())
