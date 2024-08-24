import numpy as np
import pandas as pd
import csv

data = pd.read_csv("cse1.csv", index_col=False)
data_sorted = data.sort_values(by='CGPA', ascending=False)
data_sorted1 = data_sorted.reset_index(drop=True)
n = data.shape[0]
t = n // 4
data_sorted1 = data_sorted.reset_index(drop=True)
df1 = pd.DataFrame(data_sorted1.iloc[0:t].reset_index(drop=True))
df2 = pd.DataFrame(data_sorted1.iloc[t:2*t].reset_index(drop=True))
df2 = df2.iloc[::-1].reset_index(drop=True)
df3 = pd.DataFrame(data_sorted1.iloc[2*t:3*t]).reset_index(drop=True)
df4 = pd.DataFrame(data_sorted1.iloc[3*t:4*t]).reset_index(drop=True)
df4 = df4.iloc[::-1].reset_index(drop=True)

# Concatenate '1' column values into a single column separated by commas
result = pd.DataFrame({
    'Column 1': df1['Roll No.'].astype(str) + ', ' + df2['Roll No.'].astype(str) + ', ' + df3['Roll No.'].astype(str) + ', ' + df4['Roll No.'].astype(str)
})
print(result)
# Export DataFrame to CSV file
result.to_csv('result.csv', index=False, sep=',', quoting=csv.QUOTE_NONNUMERIC)
