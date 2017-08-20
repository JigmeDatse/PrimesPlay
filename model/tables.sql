
CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE IF NOT EXISTS primes (
	primeid		uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	primenumber	int NOT NULL,
	primevalue	int NOT NULL
);

CREATE TABLE IF NOT EXISTS unverified (
	unverifiedid	uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	value		int NOT NULL,
	latestprime	int,
	lastprime	int
);

CREATE TABLE IF NOT EXISTS primesunverifiedkeys (
	primesunverifiedid	uuid PRIMARY KEY DEFAULT gen_random_uuid(),
	primeid			uuid REFERENCES primes (primeid) ON UPDATE NO ACTION ON DELETE NO ACTION,
	unverifiedid		uuid REFERENCES unverified (unverifiedid) ON UPDATE NO ACTION ON DELETE NO ACTION
);
