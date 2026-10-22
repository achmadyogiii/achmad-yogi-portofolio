import { cpSync, existsSync, mkdirSync, rmSync } from 'node:fs';
import { join } from 'node:path';

const outputDirectory = 'vercel-dist';
const staticPaths = ['build', 'images', 'favicon.ico', 'robots.txt'];

for (const path of staticPaths) {
    const source = join('public', path);

    if (!existsSync(source)) {
        throw new Error(`Required Vercel static asset is missing: ${source}`);
    }
}

rmSync(outputDirectory, { recursive: true, force: true });
mkdirSync(outputDirectory, { recursive: true });

for (const path of staticPaths) {
    cpSync(join('public', path), join(outputDirectory, path), { recursive: true });
}
