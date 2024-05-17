CREATE TABLE customerinfo (
    customer_id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    contact_no VARCHAR(11)
);

CREATE TABLE visitinfo (
    visit_id INT PRIMARY KEY,
    date DATE,
    purpose VARCHAR(100),
    time_in TIME WITHOUT TIME ZONE,
    time_out TIME WITHOUT TIME ZONE,
    package VARCHAR(50),
    head INTEGER,
    total_price NUMERIC(10,2),
    customer_id INT REFERENCES customerinfo(customer_id)
);

CREATE TABLE facilities (
    facility_id SERIAL PRIMARY KEY,
    visit_id INT REFERENCES visitinfo(visit_id),
    facility VARCHAR(100)
);

CREATE TABLE addons (
    add_on_id SERIAL PRIMARY KEY,
    visit_id INT REFERENCES visitinfo(visit_id),
    add_on VARCHAR(100)
);

CREATE TABLE messages (
    fullname VARCHAR(50),
    province VARCHAR(50),
    subject TEXT
);

CREATE TABLE admin_account (
    username VARCHAR(25),
    password VARCHAR(25)
);


INSERT INTO customerinfo (name, contact_no) VALUES
('James Castillo', '09563902628'),
('Joshua Mielca', '09563456272'),
('Ric Villanueva', '09575753635'),
('Rikka Brown', '09567856743'),
('Rizza Alday', '09568567893'),
('Liza Tiquis', '09967894683'),
('Roderick Tangapa', '09678967946'),
('Isla Villanueva', '09563583839'),
('Butz Alday', '09890789754'),
('Elton Brown', '09805934684'),
('Angelica Pasaludos', '09856784573'),
('Cherry Garing', '09856967956'),
('Miguel Santos', '09457456846'),
('Cyrus Ramos', '09967967959'),
('Emilio Torres', '09505795954'),
('Ingram Opdenort', '09789067856'),
('Angelica Mendoza', '09456457880'),
('Romel Magpantay', '09579466596'),
('John Tiquis', '09856385693'),
('Ryan Aranez', '09356955678'),
('Zingkie Palubo', '09568356896'),
('Brave Aquino', '09075890456'),
('Patrick Gonzales', '09457456745'),
('Perla Sandoval', '09368583589'),
('Danny De Castro', '09687047679'),
('Henrry Melidia', '09347457399'),
('Sharmaine Icaro', '09568537567'),
('Helen Reyes', '09457645856'),
('Camille Abu', '09758548456'),
('Allan Cruz', '09758957856'),
('Linet Torres', '09578095964'),
('Philip Rivera', '09456856787'),
('Arjay Olgado', '09597897845'),
('Russel Cuevas', '09567895554'),
('Roy Cuevas', '09476457445'),
('Merly Geronimo', '09786096755'),
('Jed Magpantay', '09507674434'),
('Densel Dantor', '09183042341'),
('Joshua Sayas', '09152350262'),
('Ben Almario', '09325223367'),
('Lucy Virtucio', '09745745553'),
('Susan Lumbera', '09345745724'),
('Judy Manalo', '09735753343'),
('Carlo Bautista', '09346346734'),
('Ricky Valentim', '09564574426'),
('Nestor Tiquis', '09679574585'),
('Javier Reyes', '09795684633'),
('Gerome Leyesa', '09343445745'),
('Melvin Baroja', '09085679464'),
('Kc Agno', '09567432578');


begin;

DO $$
DECLARE
    i INT;
    package_name TEXT;
    facilities TEXT[];
BEGIN
    FOR i IN 1..500 LOOP
        SELECT package INTO package_name FROM visitinfo WHERE visit_id = i;
        
        CASE package_name
            WHEN 'package1' THEN facilities := ARRAY['Hotel', 'Kitchen', 'Pool'];
            WHEN 'package2' THEN facilities := ARRAY['FH 1', 'FH 2', 'Kitchen'];
            WHEN 'package3' THEN facilities := ARRAY['Hotel', 'Kitchen', 'Pool', 'FH 1', 'FH 2', 'Kubo'];
            ELSE facilities := ARRAY['Kitchen', 'Kubo', 'Pool'];
        END CASE;

        FOR j IN 1..array_length(facilities, 1) LOOP
            INSERT INTO facilities (visit_id, facility) VALUES (i, facilities[j]);
        END LOOP;
    END LOOP;
END $$;


commit;

DO $$
DECLARE
    i INT;
    visit_date DATE;
    time_in TIME;
    time_out TIME;
    package_list TEXT[] := ARRAY['Stove', 'Rice Cooker', 'Grill', 'Karaoke'];
    packages TEXT[] := ARRAY['package1', 'package2', 'package3', 'no package'];
    customer_count INT := 50;
    random_customer INT;
BEGIN
    FOR i IN 1..500 LOOP
        visit_date := (DATE '2024-05-17' + (i / 10)::INT);
        time_in := (TIME '08:00:00' + (i % 12) * INTERVAL '1 hour');
        time_out := time_in + INTERVAL '4 hour';
        random_customer := (i % customer_count) + 1;
        INSERT INTO visitinfo (visit_id, date, purpose, time_in, time_out, package, head, total_price, customer_id)
        VALUES (i, visit_date, 'Leisure', time_in, time_out, packages[(i % 4) + 1], (i % 10) + 1, 5000 + i * 10, random_customer);
    END LOOP;
END $$;


begin;

DO $$
DECLARE
    i INT;
    addon_list TEXT[] := ARRAY['Stove', 'Rice Cooker', 'Grill', 'Karaoke'];
BEGIN
    FOR i IN 1..500 LOOP
        INSERT INTO addons (visit_id, add_on) VALUES
        (i, addon_list[(i % 4) + 1]);
        IF random() > 0.33 THEN
            INSERT INTO addons (visit_id, add_on) VALUES
            (i, addon_list[((i + 1) % 4) + 1]);
        END IF;
        IF random() > 0.66 THEN
            INSERT INTO addons (visit_id, add_on) VALUES
            (i, addon_list[((i + 2) % 4) + 1]);
        END IF;
    END LOOP;
END $$;
commit;