PGDMP     -                    |            ptsmart     14.13 (Debian 14.13-1.pgdg120+1)    15.4 /    :           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ;           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            <           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            =           1262    16384    ptsmart    DATABASE     r   CREATE DATABASE ptsmart WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';
    DROP DATABASE ptsmart;
                ptsmart    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                ptsmart    false            >           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   ptsmart    false    4            ?           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   ptsmart    false    4            �            1259    24663 	   customers    TABLE     i  CREATE TABLE public.customers (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    "isApproved" boolean DEFAULT false NOT NULL,
    "isSubscribed" boolean DEFAULT false NOT NULL,
    "idEmployee" bigint NOT NULL,
    "idProduct" bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.customers;
       public         heap    ptsmart    false    4            �            1259    24662    customers_id_seq    SEQUENCE     y   CREATE SEQUENCE public.customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.customers_id_seq;
       public          ptsmart    false    218    4            @           0    0    customers_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.customers_id_seq OWNED BY public.customers.id;
          public          ptsmart    false    217            �            1259    24644 	   employees    TABLE     N  CREATE TABLE public.employees (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    "isManager" boolean DEFAULT false NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.employees;
       public         heap    ptsmart    false    4            �            1259    24643    employees_id_seq    SEQUENCE     y   CREATE SEQUENCE public.employees_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.employees_id_seq;
       public          ptsmart    false    214    4            A           0    0    employees_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.employees_id_seq OWNED BY public.employees.id;
          public          ptsmart    false    213            �            1259    24625 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    ptsmart    false    4            �            1259    24624    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          ptsmart    false    4    210            B           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          ptsmart    false    209            �            1259    24632    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    ptsmart    false    4            �            1259    24631    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          ptsmart    false    4    212            C           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          ptsmart    false    211            �            1259    24656    products    TABLE     �   CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    ptsmart    false    4            �            1259    24655    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          ptsmart    false    4    216            D           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          ptsmart    false    215            �           2604    24666    customers id    DEFAULT     l   ALTER TABLE ONLY public.customers ALTER COLUMN id SET DEFAULT nextval('public.customers_id_seq'::regclass);
 ;   ALTER TABLE public.customers ALTER COLUMN id DROP DEFAULT;
       public          ptsmart    false    217    218    218            �           2604    24647    employees id    DEFAULT     l   ALTER TABLE ONLY public.employees ALTER COLUMN id SET DEFAULT nextval('public.employees_id_seq'::regclass);
 ;   ALTER TABLE public.employees ALTER COLUMN id DROP DEFAULT;
       public          ptsmart    false    213    214    214            �           2604    24628    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          ptsmart    false    210    209    210            �           2604    24635    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          ptsmart    false    212    211    212            �           2604    24659    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          ptsmart    false    216    215    216            7          0    24663 	   customers 
   TABLE DATA           ~   COPY public.customers (id, name, "isApproved", "isSubscribed", "idEmployee", "idProduct", created_at, updated_at) FROM stdin;
    public          ptsmart    false    218   U7       3          0    24644 	   employees 
   TABLE DATA           f   COPY public.employees (id, name, "isManager", username, password, created_at, updated_at) FROM stdin;
    public          ptsmart    false    214   �7       /          0    24625 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          ptsmart    false    210   �8       1          0    24632    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          ptsmart    false    212   �9       5          0    24656    products 
   TABLE DATA           K   COPY public.products (id, name, price, created_at, updated_at) FROM stdin;
    public          ptsmart    false    216   �9       E           0    0    customers_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.customers_id_seq', 4, true);
          public          ptsmart    false    217            F           0    0    employees_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.employees_id_seq', 3, true);
          public          ptsmart    false    213            G           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
          public          ptsmart    false    209            H           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          ptsmart    false    211            I           0    0    products_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.products_id_seq', 2, true);
          public          ptsmart    false    215            �           2606    24670    customers customers_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.customers DROP CONSTRAINT customers_pkey;
       public            ptsmart    false    218            �           2606    24652    employees employees_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.employees DROP CONSTRAINT employees_pkey;
       public            ptsmart    false    214            �           2606    24654 #   employees employees_username_unique 
   CONSTRAINT     b   ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_username_unique UNIQUE (username);
 M   ALTER TABLE ONLY public.employees DROP CONSTRAINT employees_username_unique;
       public            ptsmart    false    214            �           2606    24630    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            ptsmart    false    210            �           2606    24639 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            ptsmart    false    212            �           2606    24642 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            ptsmart    false    212            �           2606    24661    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            ptsmart    false    216            �           1259    24640 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            ptsmart    false    212    212            �           2606    24671 &   customers customers_idemployee_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_idemployee_foreign FOREIGN KEY ("idEmployee") REFERENCES public.employees(id) ON DELETE CASCADE;
 P   ALTER TABLE ONLY public.customers DROP CONSTRAINT customers_idemployee_foreign;
       public          ptsmart    false    3226    218    214            �           2606    24676 %   customers customers_idproduct_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_idproduct_foreign FOREIGN KEY ("idProduct") REFERENCES public.products(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.customers DROP CONSTRAINT customers_idproduct_foreign;
       public          ptsmart    false    216    218    3230            7   �   x����
�0��s�}�I����m��+xQ��0X+��՛R��>���|^�8�q�g�[=��w��hk�$anm�`X�u�A�5A���{"q^<���nC̪�6[bA/���0�G.v�K͖J�/�P޿���1�]�4�      3   �   x���MsC@ ���W8���.���G;h�%4az	V���bg���c�=�{y^�kC�S]�A����f�¨DG�'�ð���|e~:���z�{#R��;��fS�*A�����0���6h�Cy���6N~��~�������WMV�?0��z������֡(�\�H������z23�����,�mr~���o��Z0[�^��=�D���~��F�4N5�1,R�x�{=�����ͱ�L)����O��?�jb      /   x   x�]�1�0@љ����ڻT�R�GIz������}�0��D�� q�ԅ�Ԧkʔ��5�:�j+}���J��I0��0�,%�O���C<q��ݸ_6�l��ayk]����s��)<�      1      x������ � �      5   G   x�3���+I-�K-Q05�M*(�44 =N##]]Cs+C+##lb\F3�����lH� �o     