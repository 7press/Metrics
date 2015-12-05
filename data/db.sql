--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.4.5
-- Started on 2015-12-05 18:34:57

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 175 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2009 (class 0 OID 0)
-- Dependencies: 175
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 173 (class 1259 OID 16446)
-- Name: cpd; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cpd (
    commit character varying(40) NOT NULL,
    percentage double precision NOT NULL
);


--
-- TOC entry 174 (class 1259 OID 16451)
-- Name: cpd_entries; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cpd_entries (
    commit character varying(40) NOT NULL,
    hash character varying(40) NOT NULL,
    start integer,
    content text,
    id character varying(255) NOT NULL,
    filename character varying(255) NOT NULL
);


--
-- TOC entry 172 (class 1259 OID 16424)
-- Name: loc; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE loc (
    commit character varying(40) NOT NULL,
    files integer NOT NULL,
    loc integer NOT NULL,
    lloc integer NOT NULL,
    lloc_classes integer NOT NULL,
    lloc_functions integer NOT NULL,
    lloc_global integer NOT NULL,
    ccn integer NOT NULL,
    ccn_methods integer NOT NULL,
    interfaces integer NOT NULL,
    traits integer NOT NULL,
    classes integer NOT NULL,
    abstract_classes integer NOT NULL,
    concrete_classes integer NOT NULL,
    functions integer NOT NULL,
    named_functions integer NOT NULL,
    anonymous_functions integer NOT NULL,
    methods integer NOT NULL,
    public_methods integer NOT NULL,
    non_public_methods integer NOT NULL,
    non_static_methods integer NOT NULL,
    static_methods integer NOT NULL,
    constants integer NOT NULL,
    class_constants integer NOT NULL,
    global_constants integer NOT NULL,
    test_classes integer NOT NULL,
    test_methods integer NOT NULL,
    ccn_by_lloc double precision NOT NULL,
    lloc_by_nof double precision NOT NULL,
    method_calls integer NOT NULL,
    static_method_calls integer NOT NULL,
    instance_method_calls integer NOT NULL,
    attribute_access integer NOT NULL,
    static_attribute_access integer NOT NULL,
    instance_attribute_access integer NOT NULL,
    global_access integer NOT NULL,
    global_variable_access integer NOT NULL,
    super_global_variable_access integer NOT NULL,
    global_constant_access integer NOT NULL,
    class_ccn_min integer NOT NULL,
    class_ccn_avg double precision NOT NULL,
    class_ccn_max integer NOT NULL,
    class_lloc_min integer NOT NULL,
    class_lloc_avg double precision NOT NULL,
    class_lloc_max integer NOT NULL,
    method_ccn_min integer NOT NULL,
    method_ccn_avg double precision NOT NULL,
    method_ccn_max integer NOT NULL,
    method_lloc_min integer NOT NULL,
    method_lloc_avg double precision NOT NULL,
    method_lloc_max integer NOT NULL,
    directories integer NOT NULL,
    namespaces integer NOT NULL,
    ncloc integer NOT NULL
);


--
-- TOC entry 1891 (class 2606 OID 16450)
-- Name: PK_cpd; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cpd
    ADD CONSTRAINT "PK_cpd" PRIMARY KEY (commit);


--
-- TOC entry 1893 (class 2606 OID 16469)
-- Name: PK_cpd_entries; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cpd_entries
    ADD CONSTRAINT "PK_cpd_entries" PRIMARY KEY (commit, hash, filename);


--
-- TOC entry 1889 (class 2606 OID 16428)
-- Name: PK_loc; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY loc
    ADD CONSTRAINT "PK_loc" PRIMARY KEY (commit);


-- Completed on 2015-12-05 18:34:57

--
-- PostgreSQL database dump complete
--

