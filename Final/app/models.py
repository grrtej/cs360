from django.db import models
from django.contrib.auth.models import User


class Job(models.Model):
    position = models.CharField(max_length=100)
    company = models.CharField(max_length=100)
    city = models.CharField(max_length=100)
    state = models.CharField(max_length=100)
    is_remote = models.BooleanField("Is it remote?")
    description = models.TextField()
    link = models.URLField()

    def __str__(self):
        return f"{self.position} @ {self.company}"


class Skill(models.Model):
    name = models.CharField(max_length=100)
    description = models.TextField()
    link = models.URLField()
    related_jobs = models.ManyToManyField(Job, verbose_name="Related Jobs")

    def __str__(self):
        some_jobs = ", ".join(str(job) for job in self.related_jobs.all()[:3])
        return f"{self.name} for {some_jobs}"


class Course(models.Model):
    name = models.CharField(max_length=100)
    link = models.URLField()
    related_skills = models.ManyToManyField(Skill, verbose_name="Related Skills")

    def __str__(self):
        return self.name

class Bookmark(models.Model):
    job = models.ForeignKey(Job,on_delete=models.CASCADE)
    related_users=models.ManyToManyField(User,verbose_name="Related Users")
