from django.contrib import admin
from .models import Job, Skill, Course, Bookmark

# Register your models here.
admin.site.register(Job)
admin.site.register(Skill)
admin.site.register(Course)
admin.site.register(Bookmark)
