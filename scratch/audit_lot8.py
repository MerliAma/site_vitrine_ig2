import os, re, glob

print("=== AUDIT DES IMAGES DANS LES VUES ===")
refs = {}
for f in glob.glob('resources/views/**/*.blade.php', recursive=True):
    txt = open(f, encoding='utf-8', errors='ignore').read()
    # match img/... patterns
    matches = re.findall(r'[\'\"\(](img/[^\'\"\)\s]+)[\'\"\)]', txt)
    for m in matches:
        clean_m = m.strip().replace('\\', '/')
        if clean_m not in refs:
            refs[clean_m] = []
        refs[clean_m].append(f.replace('\\', '/'))

for r, files in sorted(refs.items()):
    disk_path = r
    exists = os.path.exists(disk_path)
    sz = os.path.getsize(disk_path) if exists else 0
    print(f"{r} -> exists: {exists}, size: {sz // 1024} KB ({sz} B)")
    for f in files[:2]:
        print(f"    used in: {f}")

print("\n=== AUDIT DES ASSETS JS/CSS DANS LES LAYOUTS ===")
layouts = [
    'resources/views/Layouts/baseHTML.blade.php',
    'resources/views/Layouts/app.blade.php',
    'resources/views/Layouts/admin/baseAdmin.blade.php',
    'resources/views/Layouts/admin/baseAdmin2.blade.php'
]
for l in layouts:
    if os.path.exists(l):
        print(f"\n--- {l} ---")
        content = open(l, encoding='utf-8', errors='ignore').read()
        links = re.findall(r'<link[^>]+href=[\'\"]([^\'\"]+)[\'\"]', content)
        scripts = re.findall(r'<script[^>]+src=[\'\"]([^\'\"]+)[\'\"]', content)
        print("Stylesheets:")
        for s in links:
            print("  ", s)
        print("Scripts:")
        for sc in scripts:
            print("  ", sc)
