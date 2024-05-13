from django.urls import path
from . import views

urlpatterns = [
    path("", views.index, name="index"),
    path("bookmarks/", views.bookmarks, name="bookmarks"),
    path("bookmark/<int:job_id>/delete/", views.delete_bookmark, name="delete-bookmark"),
    path("bookmark/<int:job_id>/add/", views.add_bookmark, name="add-bookmark"),
]
