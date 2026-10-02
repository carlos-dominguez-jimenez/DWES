class Estudiante():
    
    def __init__(self,nombre,edad,curso):
        self.nombre = nombre
        self.edad = edad
        self.curso=curso
        
    def nombreEstudiante(self):
        return self.nombre
    
    def edadEstudiante(self):
        return self.edad
    
    def cursoEstudiante(self):
        return self.curso
    
est1 = Estudiante("Carlos", 21, "2º DAW")
est2 = Estudiante("Álvaro", 20, "2º DAW")
est3 = Estudiante("Ainhoa", 21, "1º DAW")

lista_estudiantes = [est1, est2, est3]

for i in lista_estudiantes:
    print("Nombre: ", i.nombreEstudiante(), " | Edad: ", i.edadEstudiante(), " | Curso: ", i.cursoEstudiante())
    