--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.4.5
-- Started on 2015-12-05 16:28:56

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 173 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1997 (class 0 OID 0)
-- Dependencies: 173
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 16424)
-- Name: loc; Type: TABLE; Schema: public; Owner: -
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
-- TOC entry 1880 (class 2606 OID 16428)
-- Name: PK_loc; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY loc
    ADD CONSTRAINT "PK_loc" PRIMARY KEY (commit);


-- Completed on 2015-12-05 16:28:56

--
-- PostgreSQL database dump complete
--

