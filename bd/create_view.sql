
create view view_tipodedereceita_nome as
select ID,nome from tipodereceita ORDER BY nome;

create view view_tipodereceita_ID as 
SELECT ID ,NOME FROM  tipodereceita ORDER BY ID;

SELECT * FROM view_tipodereceita_ID


