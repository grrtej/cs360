# Generated by Django 5.0.4 on 2024-04-24 23:21

import django.db.models.deletion
from django.conf import settings
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0006_bookmark'),
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.RemoveField(
            model_name='bookmark',
            name='bookmark_id',
        ),
        migrations.RemoveField(
            model_name='bookmark',
            name='bookmark_type',
        ),
        migrations.RemoveField(
            model_name='bookmark',
            name='user',
        ),
        migrations.AddField(
            model_name='bookmark',
            name='job',
            field=models.ForeignKey(default=1, on_delete=django.db.models.deletion.CASCADE, to='app.job'),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='bookmark',
            name='related_users',
            field=models.ManyToManyField(to=settings.AUTH_USER_MODEL, verbose_name='Related Users'),
        ),
    ]
