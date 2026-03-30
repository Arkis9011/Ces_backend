import os

directory = r"c:\laragon\www\admin_ces\resources\views\public"
# We target the class and the specific style pattern commonly used in the footer.
target_class = 'footer-tricolor'

for root, _, files in os.walk(directory):
    for f in files:
        if f.endswith('.blade.php'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8') as file:
                lines = file.readlines()
            
            new_lines = []
            found = False
            for line in lines:
                if target_class in line and '<div' in line and 'background:linear-gradient' in line:
                    print(f"Removing tricolor footer from {f}")
                    found = True
                    continue # Skip this line
                new_lines.append(line)
            
            if found:
                with open(path, 'w', encoding='utf-8') as file:
                    file.writelines(new_lines)

print("Done.")
