from django.shortcuts import render
from django.core.exceptions import BadRequest, PermissionDenied
from .models import Usuario, Proyecto, Tarea, AsignacionTarea, Etiqueta, Comentario

#Ejercicio 1
def index(request):
    return render(request, 'blog/index.html')

#Ejercicio2
def listar_proyectos(request):
    proyectos = Proyecto.objects.select_related("creador").prefetch_related("proyectos_asignados")
    proyectos = proyectos.all()
    return render(request, 'blog/lista.html', {"proyectos_mostrar": proyectos})

#Ejercicio3
def dame_tareas_proyecto(request, id_proyecto):
    tareas = Tarea.objects.select_related("proyecto", "creador")
    tareas = tareas.filter(proyecto=id_proyecto).order_by("-fecha_creacion")
    return render(request, 'tarea/lista.html', {"tareas_mostrar": tareas})

#Ejercicio4
def dame_usuarios_tarea(request, id_tarea):
    usuarios = AsignacionTarea.objects.select_related("usuario", "tarea").filter(tarea_id=id_tarea).order_by("fecha_asignacion")
    return render(request, 'tarea/usuarios.html', {"usuarios_mostrar": usuarios})

#Ejercicio5
def dame_tareas_observaciones(request, texto_observacion):
    observacion = AsignacionTarea.objects.select_related("tarea").filter(observaciones=texto_observacion)
    return render(request, 'tarea/observacion.html', {"observacion": observacion})

#Ejercicio6
def tarea_completada(request, estado, fecha_creacion):
    tarea_completa = Tarea.objects.filter(estado="Completada", fecha_creacion__year__gt=2025, fecha_creacion__year__lt=2027)
    return render(request, 'tarea/tarea_completada.html', {"tarea_completada": tarea_completa})

#Ejercicio7
def comentario_proyecto(request, proyecto_id):
    comentario = Comentario.objects.select_related("autor", "comentario").filter(comentario__proyecto_id=proyecto_id).order_by('-fecha_comentario')[:1].get()
    return render(request, 'blog/comentario.html', {"comentario": comentario})

#Ejercicio8
def comentario_especifico(request, palabra, anio_comentario):
    comentario_concreto = Comentario.objects.select_related("autor", "comentario").filter(comentario__titulo__startswith=palabra, fecha_comentario__year=anio_comentario)
    return render(request, 'blog/comentario_tarea.html', {"comentario_tarea": comentario_concreto})

#Ejercicio9
def etiqueta_proyecto(request, id_proyecto):
    etiquetas = Etiqueta.objects.filter(etiquetas_asociadas__proyecto=id_proyecto).distinct()
    return render(request, 'blog/etiqueta.html', {"etiquetas": etiquetas})