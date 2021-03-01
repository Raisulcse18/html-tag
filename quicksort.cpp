#include<iostream>
using namespace std;
int  partition(int arr[], int p,int r);
void  quicksort(int arr[],int p,int r)
{ int q;
if (p<r)
{  q= partition(arr,p,r);
quicksort(arr,p,q-1);
quicksort(arr,q+1,r);
}
}
int  partition(int  arr[],int  p, int r)
{    int t,k,y,i,x;
x=arr[r];
i=p-1;
for(int j=p;j<r;j++)
{  if(arr[j]<=x)
{  i=i+1;
t=arr[i];
arr[i]=arr[j];
arr[j]= t;
}
}
k=arr[i+1];
arr[i+1]=arr[r];
arr[r]=k;
y = i+1;
return y  ; }
int  main(){
int arr[8],i;
cout<<"Enter array elements : \n";
for(i=0;i<8 ;i++)
{  cin>>arr[i]; }
cout<<"\n The array elements are : \n";
for(i=0;i<8;i++)
{   cout<<arr[i];  }
quicksort(arr,1,8);
cout<<" sorted array elements are :\n";
for(i=0;i<8;i++)
cout<<  arr[i];
return 0;
}
