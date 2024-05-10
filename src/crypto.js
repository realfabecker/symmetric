const crypto = require('node:crypto');
const fs = require("node:fs")
const path = require("node:path")

const config = {
    alg: "aes-128-ctr",
    key: "lbwyBzfgzUIvXZFS",
    iv_ln: 16,
    res: path.join(__dirname, "..", "resources", "secrets")
}

function encrypt({text, alg, key, iv_ln}) {
    const iv = crypto.randomBytes(iv_ln);
    const cipher = crypto.createCipheriv(alg, Buffer.from(key), iv)
    const encrypted = Buffer.concat([cipher.update(text), cipher.final()]);
    return iv.toString('hex') + ":" + encrypted.toString("hex");
}

function decrypt({encrypted, alg, key}) {
    const [iv_hex, txt_hex] = encrypted.split(":")
    const iv = Buffer.from(iv_hex, "hex");
    const txt = Buffer.from(txt_hex, "hex");
    const decipher = crypto.createDecipheriv(alg, Buffer.from(key), iv);
    const decrypted = decipher.update(txt)
    return Buffer.concat([decrypted, decipher.final()]).toString();
}

try {
    const e = encrypt({text: "text to be encrypted (nodejs)", ...config})
    console.log(`Encrypted: ${e}`)
    fs.writeFileSync(path.join(config.res, `${config.alg}_js.txt`), e);

    const d = decrypt({encrypted: e, ...config})
    console.log(`Decrypted: ${d}`)

    if (fs.existsSync(path.join(config.res, `${config.alg}_php.txt`))) {
        const encrypted = fs.readFileSync(path.join(config.res, `${config.alg}_php.txt`), "utf8")
        const decrypted = decrypt({encrypted, ...config})
        console.log(`Decrypted: ${decrypted}`)
    }
} catch (e) {
    console.log(e)
}