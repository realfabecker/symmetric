export class Hex {
    hex2bin(hex) {
        if (typeof hex !== 'string') {
            throw new TypeError('Expected input to be a string');
        }
        if (hex.length % 2 !== 0) {
            throw new RangeError('Expected string to be an even number of characters');
        }
        const binary = new Uint8Array(hex.length / 2);
        for (let i = 0; i < hex.length; i += 2) {
            binary[i / 2] = parseInt(hex.substr(i, 2), 16);
        }
        return binary;
    }
}

