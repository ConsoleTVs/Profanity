# -*- coding: utf-8 -*-
import json, glob

files = glob.glob("*")

dictionary = []

for file in files:
    if file != __file__ and file != 'output.json':
        f = open(file, 'r', encoding="utf8")
        for line in f:
            d = {'language': file, 'word': line.rstrip()}
            dictionary.append(d)

output = open('output.json', 'w')
output.write(json.dumps(dictionary, indent=4, sort_keys=True))
