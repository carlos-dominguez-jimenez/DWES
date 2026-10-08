from django.contrib import admin
from .models import Alumno, Profesor, TipoCurso

# Register your models here.
admin.site.register(Alumno)
admin.site.register(Profesor)
admin.site.register(TipoCurso)