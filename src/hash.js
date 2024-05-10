const bcrypt = require("bcrypt")
const fs = require("node:fs")
const path = require("node:path")


function xhash(config) {
    console.log(`Pass: ${config.pas}`)
    const salt = bcrypt.genSaltSync(10)
    const hash = bcrypt.hashSync(config.pas, salt)
    fs.writeFileSync(config.res, hash, "utf8")
    console.log(`Hashed: ${hash}`)
}

function xverify(config) {
    console.log(`Pass: ${config.pas}`)
    const hash = fs.readFileSync(config.res, 'utf8').trim()
    console.log(`Hashed: ${hash}`)
    const isValid = bcrypt.compareSync(config.pas, hash)
    console.log(`Verified: ${isValid}`)
}

(async () => {
    const config = {
        pas: 'abcx210',
        res: path.join(__dirname, "..", "resources", "secrets", "hashBcrypt.txt")
    }
    const opr = process?.argv[2]
    if(!opr) {
        console.log(`err: command is required`)
        process.exit(1)
    }
    const act = {
        verify: () => xverify(config),
        hash: () => xhash(config)
    }
    if(!act[opr]) {
        console.log(`err: command is invalid`)
        process.exit(1)
    }
    act[opr]()
})()
