const bcrypt = require("bcrypt")
const fs = require("node:fs")
const path = require("node:path")

export class Bcrypt {
    hash(config) {
        console.log(`Pass: ${config.pas}`)
        const salt = bcrypt.genSaltSync(10)
        const hash = bcrypt.hashSync(config.pas, salt)
        fs.writeFileSync(config.res, hash, "utf8")
        console.log(`Hashed: ${hash}`)
    }

    verify(config) {
        console.log(`Pass: ${config.pas}`)
        const hash = fs.readFileSync(config.res, 'utf8').trim()
        console.log(`Hashed: ${hash}`)
        const isValid = bcrypt.compareSync(config.pas, hash)
        console.log(`Verified: ${isValid}`)
    }
}