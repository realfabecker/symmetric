import {fileURLToPath} from "node:url";
import path from "node:path";
import fs from "node:fs";

export class Resource {
    read(p) {
        const d = path.dirname(fileURLToPath(import.meta.url))
        const pt = path.join(d, "..", "..", "resources", p)
        return fs.readFileSync(pt, {encoding: "utf-8"})
    }

    exists(p){
        const d = path.dirname(fileURLToPath(import.meta.url))
        const pt = path.join(d, "..", "..", "resources", p)
        return fs.existsSync(pt)
    }

    store(p, data) {
        const d = path.dirname(fileURLToPath(import.meta.url))
        const pt = path.join(d, "..", "..", "resources", p)
        return fs.writeFileSync(pt, data)
    }
}