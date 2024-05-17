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

INSERT INTO messages (fullname, province, subject) VALUES
('James Castillo', 'San Jose, Batangas', 'Inquiry about product availability'),
('Joshua Mielca', 'San Juan, Batangas', 'Request for quotation'),
('Ric Villanueva', 'Lipa, Batangas', 'Follow-up on order status'),
('Rikka Brown', 'Tanauan, Batangas', 'Feedback on recent purchase'),
('Rizza Alday', 'Nasugbu, Batangas', 'Complaint about delivery delay'),
('Liza Tiquis', 'Taal, Batangas', 'Inquiry about warranty policy'),
('Roderick Tangapa', 'Bauan, Batangas', 'Request for bulk order discount'),
('Isla Villanueva', 'Batangas City, Batangas', 'Inquiry about new arrivals'),
('Butz Alday', 'San Pascual, Batangas', 'Follow-up on refund request'),
('Elton Brown', 'Mabini, Batangas', 'Inquiry about store locations'),
('Angelica Pasaludos', 'Agoncillo, Batangas', 'Feedback on customer service'),
('Cherry Garing', 'Alitagtag, Batangas', 'Inquiry about return policy'),
('Miguel Santos', 'Balayan, Batangas', 'Request for product catalog'),
('Cyrus Ramos', 'Balete, Batangas', 'Complaint about defective item'),
('Emilio Torres', 'Cuenca, Batangas', 'Inquiry about payment methods'),
('Ingram Opdenort', 'Ibaan, Batangas', 'Request for technical support'),
('Angelica Mendoza', 'Laurel, Batangas', 'Inquiry about loyalty program'),
('Romel Magpantay', 'Lemery, Batangas', 'Feedback on website usability'),
('John Tiquis', 'Lian, Batangas', 'Inquiry about shipment tracking'),
('Ryan Aranez', 'Lobo, Batangas', 'Request for invoice copy'),
('Zingkie Palubo', 'Mataasnakahoy, Batangas', 'Inquiry about product customization'),
('Brave Aquino', 'Padre Garcia, Batangas', 'Feedback on store cleanliness'),
('Patrick Gonzales', 'Rosario, Batangas', 'Inquiry about promotional offers'),
('Perla Sandoval', 'San Luis, Batangas', 'Complaint about missing items'),
('Danny De Castro', 'San Nicolas, Batangas', 'Request for installation service'),
('Henrry Melidia', 'Santa Teresita, Batangas', 'Inquiry about exchange policy'),
('Sharmaine Icaro', 'Santo Tomas, Batangas', 'Follow-up on support ticket'),
('Helen Reyes', 'Taysan, Batangas', 'Feedback on packaging quality'),
('Camille Abu', 'Tingloy, Batangas', 'Inquiry about membership benefits'),
('Allan Cruz', 'Tuy, Batangas', 'Request for partnership details'),
('Linet Torres', 'San Jose, Batangas', 'Inquiry about seasonal sales'),
('Philip Rivera', 'San Juan, Batangas', 'Feedback on product quality'),
('Arjay Olgado', 'Lipa, Batangas', 'Inquiry about restocking schedule'),
('Russel Cuevas', 'Tanauan, Batangas', 'Request for expedited shipping'),
('Roy Cuevas', 'Nasugbu, Batangas', 'Complaint about incorrect order'),
('Merly Geronimo', 'Taal, Batangas', 'Inquiry about store credit'),
('Jed Magpantay', 'Bauan, Batangas', 'Feedback on delivery experience'),
('Densel Dantor', 'Batangas City, Batangas', 'Request for custom order'),
('Joshua Sayas', 'San Pascual, Batangas', 'Inquiry about bulk pricing'),
('Ben Almario', 'Mabini, Batangas', 'Complaint about product damage'),
('Lucy Virtucio', 'Agoncillo, Batangas', 'Inquiry about order cancellation'),
('Susan Lumbera', 'Alitagtag, Batangas', 'Feedback on online ordering system'),
('Judy Manalo', 'Balayan, Batangas', 'Request for product recommendation'),
('Carlo Bautista', 'Balete, Batangas', 'Inquiry about out-of-stock items'),
('Ricky Valentim', 'Cuenca, Batangas', 'Follow-up on order confirmation'),
('Nestor Tiquis', 'Ibaan, Batangas', 'Inquiry about product specifications'),
('Javier Reyes', 'Laurel, Batangas', 'Feedback on support response time'),
('Gerome Leyesa', 'Lemery, Batangas', 'Inquiry about gift wrapping service'),
('Melvin Baroja', 'Lian, Batangas', 'Complaint about billing error'),
('Kc Agno', 'Lobo, Batangas', 'Inquiry about international shipping');

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