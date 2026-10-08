from django.shortcuts import render
from .models import Alumno, Profesor, TipoCurso


def lista_alumnos(request):
    alumnos = Alumno.objects.all()
    return render(request, 'curso/lista_alumnos.html', {'alumnos': alumnos})


def lista_profesores(request):
    profesores = Profesor.objects.all()
    return render(request, 'curso/lista_profesores.html', {'profesores': profesores})


def lista_tipos_curso(request):
    tipos = TipoCurso.objects.all()
    return render(request, 'curso/lista_tipos_curso.html', {'tipos': tipos})