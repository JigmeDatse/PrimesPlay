
CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE IF NOT EXISTS primes (
	primeid		uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	primenumber	int NOT NULL,
	primevalue	int NOT NULL
);

CREATE UNIQUE INDEX IF NOT EXISTS primenumber_idx ON primes (primenumber);
CREATE UNIQUE INDEX IF NOT EXISTS primevalue_idx ON primes (primevalue);

INSERT INTO primes (primenumber, primevalue) VALUES (1, 2);

CREATE TABLE IF NOT EXISTS unverified (
	unverifiedid	uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	value		int NOT NULL,
	firstprime	int,
	latestprime	int,
	lastprime	int
);

INSERT INTO unverified (value) VALUES (3);

CREATE UNIQUE INDEX IF NOT EXISTS unverifiedvalue_idx ON unverified (value);

CREATE TABLE IF NOT EXISTS primesunverifiedkeys (
	primesunverifiedid	uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	primeid			uuid REFERENCES primes (primeid) ON UPDATE NO ACTION ON DELETE NO ACTION,
	unverifiedid		uuid REFERENCES unverified (unverifiedid) ON UPDATE NO ACTION ON DELETE NO ACTION
);


