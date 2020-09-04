# -*- coding: utf-8 -*-
import json, glob

files = glob.glob("*")

dictionary = []
wc = 0
output_file = 'output.json'

for file in files:
    if file != __file__ and file != output_file:
        f = open(file, 'r', encoding="utf8")
        print("Generating for language: " + str(file))
        for line in f:
            if file == 'fa' or file=='ar':
                d= {'language':file,'word':"\u0640*".join(line.rstrip())}
            else:
                d = {'language': file, 'word': line.rstrip()}
            dictionary.append(d)
            wc += 1

output = open(output_file, 'w')
output.write(json.dumps(dictionary, indent=4, sort_keys=True))
print("Done... " + str(wc) + " total words added in " + str(output_file))
